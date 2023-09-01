import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static values = {
        count: { type: Number, default: 0 },
    };

    static targets = [
        'count',
        'initialDiv',
        'progressDiv'
    ];

    static classes = ['hide'];

    initialize(){
        console.log('Initialize fired...');
    }

    connect() {
        console.log('Connect fired...');
        this.countTarget.innerText = this.countValue;
    }

    disconnect() {
        console.log('Disconnect fired...');
    }

    countValueChanged(value, previousValue) {
        console.log(`${previousValue} changed to ${value}`);
        if (value === 1) {
            this.initialDivTarget.classList.add(this.hideClass);
            this.progressDivTarget.classList.remove(this.hideClass);
        }
    }

    increment() {
        this.countValue++;
        this.countTarget.innerText = this.countValue;
    }

    reset() {
        // cleanup for page cache
        this.countValue = 0;
        this.initialDivTarget.classList.remove(this.hideClass);
        this.progressDivTarget.classList.add(this.hideClass);
    }

}