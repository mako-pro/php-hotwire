import { Modal } from "tailwindcss-stimulus-components";

function sleep(ms) {
    return new window.Promise((resolve) => {
        setTimeout(resolve, ms);
    });
}

export default class extends Modal {
    static targets = [...Modal.targets, ...['modalContent']];

    static values = {
        ...Modal.values,
        ...{
            url: String
        }
    };

    open(e) {
        e.preventDefault();
        this.loadContent();
        super.open(e);
    }

    close(e) {
        if (this.hasModalContentTarget) {
            const frame = this.modalContentTarget;
            frame.innerHTML = '';
        }
        super.close(e);
    }

    loadContent() {
        if (this.hasModalContentTarget && this.hasUrlValue) {
            const frame = this.modalContentTarget;

            let reloadFlag = false;
            if (frame.src === this.urlValue) {
                reloadFlag = true;
            }
            frame.src = this.urlValue;
            if (reloadFlag) {
                frame.reload();
            }
        }
    }

    async closeOnSuccessSubmit(event) {
        if (event.detail.success) {
            await sleep(2000);
            const redirect = event.detail.fetchResponse.response.headers.get('X-Redirect');
            if (redirect) {
                Turbo.visit(redirect);
            } else {
                this.close(event);
            }
        }
    }
}
