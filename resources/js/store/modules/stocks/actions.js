import * as actions from "../../action-types";
import * as mutations from "../../mutation-types";
import Axios from "axios";

export default {
    [actions.SUBMIT_STOCK]({ commit }, payload) {
        Axios.post("/stocks", payload)
            .then(res => {
                if (res.data.success == true) {
                    window.location.href = "/stocks";
                }
            })
            .catch(err => {
                // console.log(err.response.data.errors);
                commit(mutations.SET_ERRORS, err.response.data.errors);
            });
    }
};
