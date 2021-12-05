function validator(formSelector,options) {
    // Gán giá trị cho tham số
    if(!options) {
        options = {}
    }
    function getParent(element,selector){
        while(element.parentElement){
            if(element.parentElement.matches(selector)){
                return element.parentElement
            }
            element = element.parentElement
        }
    }
    formRules = {
    }
    validatorRules = {
        required : function(value){ 
            return value ? undefined : 'Vui lòng nhập trường này'
        },
        email : function(value){ 
            var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
            return regex.test(value) ? undefined : 'Vui lòng email'
        },
        min : function(min) {
            return function(value){
                return value.length >= min ? undefined : `Vui lòng nhập tối thiểu ${min} kí tự`
            }
        },
        max : function(max) {
            return function(value){
                return value.length <= max ? undefined : `Vui lòng nhập tối đa ${max} kí tự`
            }
        }
    }
    
    // Lấy ra formElement trong DOM
    formElement = document.querySelector(formSelector)
    // Chỉ xử lí khi có element này trong DOM
    if(formElement){
        var inputs = formElement.querySelectorAll('[rules][name]')
        
        for(var input of inputs){
            var rules = input.getAttribute('rules').split('|')
            for(var rule of rules){
                var isRuleHasValue = rule.includes(':')
                var ruleValue
                if(isRuleHasValue){
                    ruleValue = rule.split(':')
                    rule = ruleValue[0]       
                }
                var ruleFunc = validatorRules[rule]
                if(isRuleHasValue){
                    ruleFunc = ruleFunc(ruleValue[1])
                }
                if(Array.isArray(formRules[input.name])){
                    formRules[input.name].push(ruleFunc)    
                }else{
                    formRules[input.name] = [ruleFunc]
                }
            }


            input.onblur = handleValidate
            input.oninput = handleClearError

        }

        function handleValidate(e){
            rules = formRules[e.target.name]
            var errorMessage
            rules.some(function(rule){
                errorMessage = rule(e.target.value)
                return errorMessage
            })
            // console.log(errorMessage)

            // Nếu có lỗi thì hiện thị lỗi ra UI
            if(errorMessage){
                var formGroup = getParent(e.target,'.form-group')
                if(formGroup){
                    formGroup.classList.add('invalid')
                    var formMessage = formGroup.querySelector('.form-message')
                    if(formMessage){
                        formMessage.innerHTML = errorMessage
                    }
                }
            }
            return !errorMessage
        }
        // xóa message lỗi
        function handleClearError(e){
            var formGroup = getParent(e.target,'.form-group')
            if(formGroup.classList.contains('invalid')){
                formGroup.classList.remove('invalid')
                var formMessage = formGroup.querySelector('.form-message')
                if(formMessage){
                    formMessage.innerHTML = ''
                }
            }
        }
        
        formElement.onsubmit = function(e){
            e.preventDefault()

            if(formElement){
                var inputs = formElement.querySelectorAll('[rules][name]')
                isValid = true
                for(var input of inputs){
                    if(handleValidate({ target : input })){
                        isValid = true
                    }else{
                        isValid = false
                    }
                }
                
                if(isValid){
                     if(typeof options.onSubmit === 'function') {
                        var enableInput = formElement.querySelectorAll(
                            "[name]:not([disabled])"
                        )
    
                        var formValues = Array.from(enableInput).reduce(function (
                            values,
                            input
                        ) {
                            switch (input.type) {
                                case 'radio':
                                    values[input.name] = formElement.querySelector('input[name="' + input.name + '"]:checked' ).value
                                    // console.log(values[input.name])
                                    break
                                case "checkbox":
                                    if(!input.matches(':checked'))  {
                                        values[input.name] = []
                                        return values
                                    }
                                    if(!Array.isArray(values[input.name])){
                                        values[input.name] = []
                                    }
                                    values[input.name].push(input.value)
                                    break
                                case 'file':
                                        values[input.name] = input.files
                                    break
                                default:
                                    values[input.name] = input.value
                            }
                            return values
                        },
                        {})
                         options.onSubmit(formValues)
                     }else{
                         formElement.submit()
                     }

                }
            } 
            
        }
    }
    // console.log(formRules)
}