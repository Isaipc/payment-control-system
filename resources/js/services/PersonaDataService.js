import axios from "axios";

class PersonaDataService
{
    getAll(categoria_id){
        return axios.get('/api/categorias/' + categoria_id +'/personas', '');
    }

    get(id){}
    findByName(title){}
    create(id){}
    update(id){}
    delete(id){}
}

export default new PersonaDataService();
