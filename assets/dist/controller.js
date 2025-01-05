import { Controller } from '@hotwired/stimulus';

function foo() {
    return 9;
}

class default_1 extends Controller {
    connect() {
        console.log(foo());
    }
}
default_1.values = {
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

export { default_1 as default };
