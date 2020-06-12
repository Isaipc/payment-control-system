import axios from "axios";

const url = '/api/cuentas';

class CuentaDataService
{
    getAll(tipos_cuenta_id){
        return axios.get(`/api/tipos-cuenta/${tipos_cuenta_id}/cuentas`);
    }

    get(id){
        return axios.get(`${url}/${id}`);
    }

    // findByName(title){}

    create(tipos_cuenta_id, data){
        return axios.post(`/api/tipos-cuenta/${tipos_cuenta_id}/cuentas`, data);
    }

    update(id, data){
        return axios.put(`${url}/${id}`, data);
    }

    delete(id){
        return axios.delete(`${url}/${id}`);
    }
}

export default new CuentaDataService();
