import { Controller } from "@hotwired/stimulus";
export default class extends Controller {
    static values: {
        url: StringConstructor;
        optionsAsHtml: BooleanConstructor;
        loadingMoreText: StringConstructor;
        noResultsFoundText: StringConstructor;
        noMoreResultsText: StringConstructor;
        createOptionText: StringConstructor;
        minCharacters: NumberConstructor;
        tomSelectOptions: ObjectConstructor;
        preload: StringConstructor;
    };
    connect(): void;
}
