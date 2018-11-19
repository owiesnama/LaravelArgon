export default class Errors {
    /**
     * Initiate the main error object
     */
    constructor() {
        this.errors = {}
    }

    /**
     * Use it to get the first
     * @param field
     * @returns {*}
     */
    get(field) {
        return this.errors[field][0]

        if (!this.errors[field]) return
    }

    /**
     *
     * @param field
     * @returns {boolean}
     */
    has(field) {
        return this.errors.hasOwnProperty(field)
    }

    /**
     *
     * @returns {boolean}
     */
    any() {
        return Object.keys(this.errors).length > 0
    }

    /**
     *
     * @param errors
     */
    record(errors) {
        this.errors = errors
    }

    /**
     *
     * @param field
     */
    clear(field) {
        if(field){
            delete  this.errors[field]
        }
        else {
            this.errors = {}
        }
    }
}