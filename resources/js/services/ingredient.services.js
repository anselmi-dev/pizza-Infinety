const BASE_URL = document.querySelector('meta[name="base_api"]').content

class IngredientServices {

    all (data = {}) {
        return new Promise((resolve, reject) => {
            axios({
                url: data.next_page_url ? data.next_page_url : BASE_URL + '/api/ingredients',
                data: data,
            }).then(resp => {
                resolve(resp.data.data)
            })
            .catch(err => {
                reject(err)
            })
        })
    }

    destroy (id) {
        return new Promise((resolve, reject) => {
            axios({
                url: BASE_URL + `/api/ingredients/${id}`,
                method: 'DELETE',
            }).then(resp => {
                resolve(resp.data.data)
            })
            .catch(err => {
                reject(err)
            })
        })
    }

    store (data) {
        return new Promise((resolve, reject) => {
            axios({
                url: BASE_URL + `/api/ingredients`,
                data,
                method: 'POST',
            }).then(resp => {
                resolve(resp.data.data)
            })
            .catch(err => {
                reject(err)
            })
        })
    }
}


export default new IngredientServices ();
