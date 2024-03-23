import axios from "axios";
import { Router } from "react-router-dom";

    const axiosClient = axios.create({
        baseURL: `${import.meta.env.VITE_API_BASE_URL}/api`,
    });
    axiosClient.interceptors.request.use((config) => {
        const token = '123';
        config.headers.Authorization = `Beatete ${token}`
        return config
    });
    axiosClient.interceptors.request.use((reponse) => {
        return reponse;
    }, error => {
        if(error.reponse && error.reponse.status === 401) {
            Router.nagative('/login')
            return error;
        }
        throw error;

    })
    export default axiosClient;