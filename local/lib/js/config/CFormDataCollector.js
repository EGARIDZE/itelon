export default class CFormDataCollector {
    static _objContainer;
    static _optData;


    static collect() {
        let formData = new FormData($('#config_form')[0]);
        //console.log(formData);
        let id = '';
        for (let [key,val] of formData) {
            let [vType, oType] = key.split('_');
            if (vType==='ID') {
                this._objContainer.opt_data[oType] ??= {};
                id = val;
                if (val) {
                    this._objContainer.opt_data[oType][val] = {
                        sku: this._optData[val].sku
                        , price: this._optData[val].price
                        , name: this._optData[val].name
                        , cnt: 1
                        , defQty: this._objContainer.objInstalled?.[val] ?? 0
                    };
                }
            } else if (id && vType==='amount') {
                this._objContainer.opt_data[oType][id].cnt = +val;
            }
        }
        //console.log(this._objContainer.opt_data);
    }
    static getData(){
        return this._objContainer;
    }
    static updateEntry(optionType, newId, cnt, oldId) {
        if (oldId) {
            if (this._objContainer.opt_data[optionType][oldId].duplicates > 0) {
                this._objContainer.opt_data[optionType][oldId].duplicates--;
                this._objContainer.opt_data[optionType][oldId].cnt -= +cnt;
            } else {
                delete this._objContainer.opt_data[optionType][oldId];
            }
        }
        if (newId) {
            this._objContainer.opt_data[optionType] ??= {};
            if (Object.hasOwn(this._objContainer.opt_data[optionType], newId)) {
                this._objContainer.opt_data[optionType][newId].duplicates++;
                this._objContainer.opt_data[optionType][newId].cnt += +cnt;
            } else {
                this._objContainer.opt_data[optionType][newId] = {
                    sku: this._optData[newId].sku
                    , price: this._optData[newId].price
                    , name: this._optData[newId].name
                    , cnt: +cnt
                    , duplicates: 0
                }
            }
        }
    }
    static refreshCnt(optionType, id, cnt) {
        if (id) this._objContainer.opt_data[optionType][id].cnt = +cnt;
    }
    static getTotalQty(obj, id) {
        let qty = 0;
        if (id) {
            obj.closest('.input-set__wrapper').find('.select-qty input').each(function(){
                if($(this).data('id')===id) qty += +$(this).val();
            });
        }
        return qty;
    }
}