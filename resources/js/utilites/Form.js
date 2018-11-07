/**
 * Created by oweisnama on 11/6/18.
 */
import Errors from './Errors'

export default class Form {
    /**
     *
     * @param fields
     * @param fieldsToSubmit
     */
    constructor(fields, fieldsToSubmit) {
        this.fields = fields
        this.initialFieldState = Object.assign({}, this.fields)
        this.fieldsToSubmit = fieldsToSubmit

        for (let field in fields) {
            this[field] = fields[field]
        }

        this.errors = new Errors()
    }

    /**
     *
     * @returns {{}}
     */
    data() {
        let data = {}

        let fields = this.fieldsToSubmit || Object.keys(this.fields)

        fields.forEach((key) => {
            data[key] = this[key]
        })

        return data
    }

    /**
     *
     */
    reset() {
        this.errors.clear()

        Object.keys(this.fields).forEach((key) => {
            this[key] = this.initialFieldState[key]
        })
    }

    /**
     *
     * @param method
     * @param endpoint
     * @returns {Promise}
     */
    submit(method, endpoint,) {
        return new Promise((resolve, reject) => {

            axios[method](endpoint, this.data())
                .then(response => {
                    this.onSuccess(response.data)
                    resolve(response.data)
                })

                .catch(({response}) => {

                    this.onFail(response.data.errors)
                    reject(response)
                })

        })
    }

    /**
     *
     * @param data
     * @returns {boolean}
     */
    onSuccess(data) {
        return true
    }

    /**
     *
     * @param errors
     */
    onFail(errors) {
        this.errors.record(errors)
    }

    /**
     *
     * @param endpoint
     * @returns {*}
     */
    post(endpoint,) {
        return this.submit('post', endpoint,)
    }

    /**
     *
     * @param endpoint
     * @returns {*}
     */
    put(endpoint,) {
        return this.submit('put', endpoint,)
    }

    /**
     *
     * @param endpoint
     * @returns {Promise}
     */
    patch(endpoint,) {
        return this.submit('patch', endpoint,)
    }

    /**
     *
     * @param endpoint
     * @returns {Promise}
     */
    get(endpoint,) {
        return this.submit('get', endpoint,)
    }

    /**
     *
     * @param endpoint
     * @returns {Promise}
     */
    delete(endpoint,) {
        return this.submit('delete', endpoint,)
    }
}