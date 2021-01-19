const BASE_URL = document.querySelector('meta[name="base_api"]').content

class PizzaService {
    all (data = {}) {
        return new Promise((resolve, reject) => {
            axios({
                url: data.next_page_url ? data.next_page_url : BASE_URL + '/api/pizzas',
                data: data,
            }).then(resp => {
                resolve(resp.data.data)
            })
            .catch(err => {
                reject(err)
            })
        })
    }

    update (data) {
        let formData = new FormData();

        formData.append('_method', 'PUT');

        formData.append('file', data.file);

        formData.append('name', data.name);

        formData.append('ingredients', JSON.stringify(data.ingredients));

        formData.append('price', data.price);

        return new Promise((resolve, reject) => {
            axios({
                url: BASE_URL + `/api/pizzas/${data.id}`,
                data: formData,
                method: 'POST',
                headers: { 'Content-Type': 'multipart/form-data' }
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
                url: BASE_URL + `/api/pizzas/${id}`,
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
        let formData = new FormData();

        formData.append('file', data.file);

        formData.append('name', data.name);

        formData.append('ingredients', JSON.stringify(data.ingredients));

        formData.append('price', data.price);

        return new Promise((resolve, reject) => {
            axios({
                url: BASE_URL + `/api/pizzas`,
                data: formData,
                method: 'POST',
                headers: { 'Content-Type': 'multipart/form-data' }
            }).then(resp => {
                resolve(resp.data.data)
            })
            .catch(err => {
                reject(err)
            })
        })
    }

    getIngredients (data = {}) {
        return new Promise((resolve, reject) => {
            axios({
                url: BASE_URL + '/api/ingredients',
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
