import axios from "axios";

const url = '/api/tipos-cuenta';

class TiposCuentaDataService
{
    getAll(){
        return axios.get(url, '');
    }

    get(id){
        return axios.get(`${url}/${id}`);
    }

    findByName(name){
        return axios.get(url + '/find/${name}');
    }
}

export default new TiposCuentaDataService();
