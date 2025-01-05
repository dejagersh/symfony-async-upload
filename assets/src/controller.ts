import {Controller} from "@hotwired/stimulus";
import {foo} from "./foo";

export default class extends Controller {
    static values = {
        url: String,
        optionsAsHtml: Boolean,
        loadingMoreText: String,
        noResultsFoundText: String,
        noMoreResultsText: String,
        createOptionText: String,
        minCharacters: Number,
        tomSelectOptions: Object,
        preload: String,
    };

    connect() {
        console.log(foo());
    }
}