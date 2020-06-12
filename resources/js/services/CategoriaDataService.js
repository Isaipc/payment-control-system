import axios from "axios";
const url = '/api/categorias';

class CategoriaDataService
{
    getAll(){
        return axios.get(url, '');
    }

    get(id){
        return axios.get(`${url}/${id}`);
    }
    findByName(title){}
    create(id){}
    update(id){}
    delete(id){}
}

export default new CategoriaDataService();
