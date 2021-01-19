const BASE_URL = document.querySelector('meta[name="base_api"]').content
const USER_ID = document.querySelector('meta[name="USER_ID"]').content

class OrdersServices {

    all (data = {}) {
        return new Promise((resolve, reject) => {
            axios({
                url: data.next_page_url ? data.next_page_url : BASE_URL + '/api/orders',
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
        data.user_id = USER_ID
        return new Promise((resolve, reject) => {
            axios({
                url: BASE_URL + `/api/orders/${data.id}`,
                data,
                method: 'PUT',
            }).then(resp => {
                resolve(resp.data.data)
            })
            .catch(err => {
                reject(err)
            })
        })
    }

    store (data) {
        data.user_id = USER_ID
        return new Promise((resolve, reject) => {
            axios({
                url: BASE_URL + `/api/orders`,
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


export default new OrdersServices ();
