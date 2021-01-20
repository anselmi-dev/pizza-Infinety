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
            .catch(error => {
                reject(error.response.data)
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
            .catch(error => {
                reject(error.response.data)
            })
        })
    }

    update (data) {
        return new Promise((resolve, reject) => {
            axios({
                url: BASE_URL + `/api/ingredients/${data.id}`,
                data,
                method: 'PUT',
            }).then(resp => {
                resolve(resp.data.data)
            })
            .catch(error => {
                reject(error.response.data)
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
            .catch(error => {
                reject(error.response.data)
            })
        })
    }
}


export default new IngredientServices ();
