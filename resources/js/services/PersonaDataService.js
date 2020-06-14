import axios from "axios";

const url = '/api/personas';

class PersonaDataService
{
    getAll(categoria_id){
        return axios.get(`/api/categorias/${categoria_id}/personas`);
    }

    get(id){
        return axios.get(`${url}/${id}`);
    }

    // findByName(title){}

    create(categoria_id, data){
        return axios.post(`/api/categorias/${categoria_id}/personas`, data);
    }

    update(id, data){
        return axios.put(`${url}/${id}`, data);
    }

    delete(id){
        return axios.delete(`${url}/${id}`);
    }
}

export default new PersonaDataService();
