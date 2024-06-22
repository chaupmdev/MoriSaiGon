import axios from 'axios'

const serviceHTTP = {
    post: function (url,data) {
        return axios.post( url, data).then(function (response) {
            return response.data;
        }).catch(function (error) {
            return error;
        });
    },
    get: function (url) {
        return axios.get( url).then(function (response) {
            return response.data;
        }).catch(function (error) {
            return error;
        });
    },
    delete: function (url) {
        return axios.delete( url).then(function (response) {
            return response.data;
        }).catch(function (error) {
            return error;
        });
    }
}

export default serviceHTTP;
