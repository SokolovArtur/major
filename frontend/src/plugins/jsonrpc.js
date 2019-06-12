import _ from "lodash";
import axios from "axios";

class JsonRpc {
  constructor(url, method, data = null) {
    let configData = {
      jsonrpc: "2.0",
      method: method,
      params: { ...data },
      id: new Date().getTime()
    };

    this.config = {
      url: url,
      method: "post",
      headers: {
        "Content-Type": "application/json"
      },
      withCredentials: true,
      data: configData
    };
    return axios(this.config).then(response => {
      const data = response.data;
      if (data.error) {
        throw data;
      }
      return _.isArray(data)
        ? data.map(response => response.result).filter(r => !!r)
        : data.result;
    });
  }
}

export default (url, method, data = null) => {
  return new JsonRpc(url, method, data);
};
