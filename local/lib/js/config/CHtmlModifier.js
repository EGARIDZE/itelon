import CFormDataCollector from "./CFormDataCollector.js";

export default class CHtmlModifier {
    static CONTAINER = '#config_form-add';

    static updTotalPrice(iPriceDif) {
        //console.log(iPriceDif);
        let objPriceDiv = $('.solution-config__price', this.CONTAINER);
        if (iPriceDif) {
            const priceFormatterRUB = new Intl.NumberFormat(
                'ru', {
                    style: 'currency'
                    , currency: 'RUB'
                    , maximumFractionDigits: 0
                });

            let oldPrice = +objPriceDiv.data('cur_price');
            let newPrice = oldPrice + iPriceDif;

            objPriceDiv.data('cur_price', newPrice);
            objPriceDiv.children(':first').text(priceFormatterRUB.format(newPrice));
        }
    }
    static updDesc(optionType, objData) {
        let $list = $('.solution-config__task-desc li', this.CONTAINER).filter(function(){
            return $(this).data('type')===optionType;
        });
        $list.not('.template').remove();
        if (objData) {
            let $liTemp = $list.filter('.template');
            for (let id in objData) {
                let $newLi = $liTemp.clone().removeClass('template');
                $newLi.children("span:first").text(objData[id].cnt);
                $newLi.children("span:last").text(objData[id].name);
                $newLi.insertBefore($liTemp);
            }
        }
    }

    static toggleBtnVisibility(obj, bDelCriteria, bAttCriteria) {
        let delBtn = obj.find('.input-set-item__delete');
        let attDiv = obj.find('.input-set__attention');

        delBtn.toggleClass('invisible', !bDelCriteria);
        attDiv.toggleClass('invisible', !bAttCriteria);
        let attentions = $('.solution-config__inputs', '#config_form')
            .find('.input-set__attention').not('.invisible').length === 0;
        $('.solution-config__attention', this.CONTAINER).toggleClass('_disabled', attentions);
        $('.solution-config__attention', '#choose-config').toggleClass('_disabled', attentions);
    }
    static addNewRow(obj) {
        let list = obj.siblings();
        let template = list.find('.template');
        let newRow = template.clone(true);
        newRow.removeClass('template');
        newRow.appendTo(list);
    }
    static resetItem(obj) {
        let item = obj.closest('.input-set__item');
        let objChecked = item.find(':checked');
        let objSelect = item.find('.select-option, .select-qty').eq(0);
        let name, objBase, newInputVal

        if (objChecked.length) {
            objChecked.removeAttr('checked'), item.find(':radio.is-base').attr('checked', '');
        } else if (objSelect.length) {
            objSelect.find('._selected').removeClass('_selected');
            objBase = objSelect.find(".is-base");
            name = objBase.text() || (objSelect.is('.select-qty') ? '0' : 'Нет');
            newInputVal = objBase.data('value') || '';
            objSelect.find('span').text(name);
            objSelect.find('input').attr('value', newInputVal);
            if (objBase.length) {
                objBase.addClass('_selected');
            }
        }
    }
    static changeFinalForm() {
        let $configFormAdd = $('#config_form-add');
        let $formTo = $('#choose-config').find('form');
        let formDataFrom = new FormData($('#config_form')[0]);
        let $configList = $configFormAdd.find('.solution-config__task-desc')
            .find('li').not('.template');
        let strConfigListHtml = '';
        strConfigListHtml = $('.solution-config__task', this.CONTAINER).children('h4').text() + '\n\n';
        $configList.each(function () {
            strConfigListHtml += $(this).text() + '\n';
        });
        let strPriceFormatted = $configFormAdd.find('.solution-config__price').children('h4').text();
        let strPrice = $configFormAdd.find('.solution-config__price').data('cur_price');
        let lTime = formDataFrom.get('leasing-agree') ? formDataFrom.get('leasing') : 0;
        let objConfigData = CFormDataCollector.getData();
        let strWarrTime = $('.solution-config__time', this.CONTAINER)
            .find(':checked').next().children('h4').text();
        let $configInfoRes = $formTo.find('.popup-form__result');
        let strLeasTime = lTime ? lTime + ' мес.' : 'нет';
        let strPlatform = $('input:checked', '#choose-platform_wrap').next().children('h4').text();
        let strAvail = $configFormAdd.find('.solution-config__place').text();

        $formTo.find('input[data-extra="inn"]').val(formDataFrom.get('inn_input'));
        $formTo.find('input[data-extra="warranty"]').val(formDataFrom.get('time'));
        $formTo.find('input[data-extra="leasing"]').val(lTime);
        $formTo.find('input[data-conf="platform"]').val(strPlatform);
        $formTo.find('input[data-conf="email"]').val(strConfigListHtml);// список опций
        $formTo.find('input[data-conf="price"]').val(strPrice);

        $formTo.find('.popup-form__block').children('h3.name').text(objConfigData.props.name);
        $formTo.find('.popup-form__block').children('h3.price').text(strPriceFormatted);
        $formTo.find('.popup-form__block').children('h3.avail').text(strAvail);
        $configInfoRes.eq(0).children('ul').empty().append($configList.clone());
        $configInfoRes.eq(1).find('span:first').text(strWarrTime);
        $configInfoRes.eq(1).find('span:last').text(strLeasTime);
        //console.log(objConfigData);
    }

    /**
    * toggle visibility for some elements
    * depending on state of leasing checkbox
    */
    static toggleClasses(bChecked) {
        let rootNode = $('.solution-config__main', this.CONTAINER);
        rootNode.find('.input-range__wrapper, .input-inn__wrapper, #checked-leasing-val').toggleClass('_hidden');
        if (bChecked) {
            $('#inn_input').prop('required', true);
            $('#config_form_submit-link').addClass('_hidden');
        } else {
            $('#inn_input').prop('required', false);
            $('#config_form_submit-link').removeClass('_hidden');
        }
    }
}