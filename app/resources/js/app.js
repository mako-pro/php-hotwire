import "@hotwired/turbo";

import { Application } from "@hotwired/stimulus";
import { definitionsFromContext } from "@hotwired/stimulus-webpack-helpers";
import { Alert, Modal } from "tailwindcss-stimulus-components";

window.Stimulus = Application.start();
const context = require.context("./controllers", true, /\.js$/);
window.Stimulus.load(definitionsFromContext(context));

window.Stimulus.register('alert', Alert);
window.Stimulus.register('modal', Modal);