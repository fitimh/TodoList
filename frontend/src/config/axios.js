import axios from 'axios';
import { showNotification } from './show-notification.js';

const instance = axios.create({
    baseURL: import.meta.env.VITE_BACKEND_URL,
    withCredentials: false,
    headers: {
        Accept: 'application/json',
        'Content-Type': 'multipart/form-data',
    },
})
// instance.defaults.headers.common = {'Authorization': `Bearer ${ localStorage.getItem('token') }`}
instance.interceptors.request.use(
    (config) => {
        return config;
    },
    (error) => {
        return Promise.reject(error);
    },
);
instance.interceptors.response.use(
    (response) => {
        if(response.data.success == true && response.data.message) {
            showNotification({
                message: String(response.data.message),
                type: 'success',
                duration: 5000,
                appearance: 'light'
            });
        }
        return response;
    },
    (error) => {
        var errors = error;

        if (error.response) {
            if (401 === error.response.status) {
                errors = error.response.data.message;
            }
            if (error.response.status == 422) {

                errors = '';
                if(error.response.data.errors) {
                    for (var errorKey in error.response.data.errors) {
                        for (var i = 0; i < error.response.data.errors[errorKey].length; i++) {
                            errors += error.response.data.errors[errorKey][i] + '<br>'
                        }
                    }
                } else {
                    errors = error.response.data.message
                }
            }
            if (500 === error.response.status) {
                errors = error.response.data.message;
            }
            if (503 === error.response.status) {
                errors = error.response.data.message;
            }
            if (error.response.status == 404) {
                errors = 'Page not found!';
            }
        }

        showNotification({
            message: String(errors),
            type: 'alert',
            duration: 5000,
            appearance: 'light'
        });

        return Promise.reject(error);
    },
);
export default instance;