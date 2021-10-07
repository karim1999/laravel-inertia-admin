import {Query} from "cogent-js/src";

export const generateJsonApiUrl= (model= "users", filters= [], sortBy= []) => {
    let url= new Query({
        base_url: "http://127.0.0.1:8000"
    }).for(model);
    filters.forEach(filter => {
        url= url.where(filter.id, filter.value)
    })
    return url.url();
}
