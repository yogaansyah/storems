import * as actions from "../../action-types";
import * as mutaions from "../../mutation-types";
import Axios from "axios";

export default {
    [actions.ADD_PRODUCT]({ commit }, payload) {
        Axios.post("/products", payload)
            .then(res => {
                if (res.data.success == true) {
                    window.location.href = "/products";
                }
            })
            .catch(err => {
                // console.log(err.response.data.errors);
                commit(mutaions.SET_ERRORS, err.response.data.errors);
            });
    }
};
