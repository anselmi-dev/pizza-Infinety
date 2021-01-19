// import axios from 'axios';
const BASE_URL = 'pizzas'

class PizzaService {
    all (data = {}) {
        return new Promise((resolve, reject) => {
            axios({
                url: data.next_page_url ? data.next_page_url : BASE_URL,
                data: data,
            }).then(resp => {
                resolve(resp.data.data)
            })
            .catch(err => {
                reject(err)
            })
        })
    }
}


export default new PizzaService ();
