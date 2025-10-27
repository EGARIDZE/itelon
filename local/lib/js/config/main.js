import CFormDataCollector from "./CFormDataCollector.js";
import CHtmlModifier from "./CHtmlModifier.js";
export default class CMain {
    static Init(jsonData){
        CFormDataCollector._objContainer = {
            opt_data : {},
            objInstalled: jsonData['ins'],
            props: jsonData['props'],
        };
        CFormDataCollector._optData = jsonData['opt'];
        $(function (){
            CFormDataCollector.collect();
            //CMain.logOptData();
            const target = $('.solution-config__inputs')[0];
            const config = {
                subtree: true,
                //childList: true,
                attributes: true,
                attributeFilter: ['value', 'checked'],
                attributeOldValue: true
            };
            const callback = (mutationList) => {
                //console.log(mutationList);
                let m = mutationList[0];
                let t = $(m.target);
                let oldVal, newVal;
                if (mutationList[1]) { //radio
                    let m1 = mutationList[1];
                    let t1 = $(m1.target);
                    oldVal = t.val();
                    newVal = t1.val();
                } else if (m.oldValue==="true") { // checkbox
                    oldVal = t.val();
                    newVal = "";
                } else { // select
                    oldVal = m.oldValue;
                    newVal = t.val();
                }

                if (newVal !== oldVal) {
                    let [valueType,optionType] = t.attr('name').split('_');
                    let p = t.closest('.input-set__item');
                    let inputCnt = p.find(":text[name^='a']");
                    let bSingleOption = p.children(':first').is('.label');
                    let cnt, id, oldId, newPrice, priceDif

                    if (valueType==='ID') {
                        cnt = inputCnt.length ? +inputCnt.val() : 1;
                        id = newVal;
                        oldId = oldVal;
                        if (inputCnt) inputCnt.data('id', newVal);
                        let oldPrice = CMain.getOptData(optionType, oldId).price || 0;
                        CFormDataCollector.updateEntry(optionType, newVal, cnt, oldVal);
                        newPrice = CMain.getOptData(optionType, id).price || 0;
                        priceDif = (newPrice - oldPrice) * cnt;
                    } else {
                        id = inputCnt.data('id');
                        oldId = false;
                        cnt = CFormDataCollector.getTotalQty(t, id);
                        let oldQty = CMain.getOptData(optionType, id).cnt || 0;
                        newPrice = CMain.getOptData(optionType, id).price || 0;
                        priceDif = (cnt - oldQty) * newPrice;
                        CFormDataCollector.refreshCnt(optionType, id, cnt);
                    }
                    let intDefCnt = CFormDataCollector._objContainer.objInstalled?.[id] || 0;
                    let bShowDelBtn = bSingleOption ? intDefCnt !== cnt : id && !intDefCnt;
                    let bShowAttIcon = id && intDefCnt !== cnt && newPrice === 0;

                    CHtmlModifier.toggleBtnVisibility(p, bShowDelBtn, bShowAttIcon);
                    CHtmlModifier.updDesc(optionType, CMain.getOptDataValuesByKey(optionType));
                    //console.log(CFormDataCollector._objContainer.props);
                    if (CFormDataCollector._objContainer.props.base_price)
                        CHtmlModifier.updTotalPrice(priceDif);

                    //CMain.logOptData('CAGE');
                    //console.log(intPrice, priceDif);
                }
            };
            const observer = new MutationObserver(callback);
            observer.observe(target, config);

            $('.input-set__append').on('click', function (e){
                e.preventDefault();
                CHtmlModifier.addNewRow($(this));
            });
            $('.input-set-item__delete').on('click', function (e){
                e.preventDefault();
                CHtmlModifier.resetItem($(this));
            });


            $('.solution-config__main :submit', '#config_form').on('click', function (e){
                let $innInput = $('#inn_input');
                if (!$innInput.prop( 'required' ) || $innInput.val()) {
                    e.preventDefault();
                    CHtmlModifier.changeFinalForm();
                }
            });
            $('.solution-config__leasing :checkbox', '#config_form-add').on('change', function (){
                CHtmlModifier.toggleClasses($(this).is(':checked'));
            });
            let innInput = $('#inn_input')[0];
            let params = {
                attributes: true,
                attributeFilter: ['class']
            };
            let innObs = new MutationObserver(mutationList=>{
                let t = $(mutationList[0].target);
                $('#config_form_submit-link').toggleClass('_hidden', !t.is('._filled'));
            });
            innObs.observe(innInput, params);

            $('.input-radio__list', '#config_form-add').on('change', 'input', function(){
                if($(this).is(':checked')){
                    $('span[data-shop-item-get="warranty"]').text($(this).next().children('h4').text());
                }
            })
        });
    }
    static getOptDataValuesByKey(key) {
        let arOptData = CFormDataCollector._objContainer['opt_data'];
        return arOptData.hasOwnProperty(key) ? arOptData[key] : false;
    }
    static getOptData(key, id) {
        return id ? CFormDataCollector.getData()["opt_data"][key][id] : false;
    }

}
