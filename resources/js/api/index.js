import axios from 'axios';
// import jsonToQuery from 'json-to-query-string';

const api = axios.create({
    baseURL: '/api',
    headers: {
        'Content-Type': 'application/json',
    }
});

// const get = async (resource, data) => await api.get(`${resource}?${jsonToQuery(data)}`);
// const post = async (resource, data) => await api.post(resource, data);

const index = async (resource) => await api.get(resource);
const show = async (resource, id = null) => await api.get(`${resource}/${id}`);
const store = async (resource, data) => await api.post(resource, data);
const update = async (resource, id, data) => await api.put(`${resource}/${id}`, data);
const destroy = async (resource, id) => await api.delete(`${resource}/${id}`);

export default {
    // get,
    // post,
    index,
    show,
    store,
    update,
    destroy,
};
