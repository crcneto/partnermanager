
/**
 * Função utilizada para aceitar somente números nos inputs. Ao digitar, somente o que for número será computado (inteiro sem pontos ou vírgulas)
 * Use: onkeypress="return somenteNumeros(event)"
 * @param {char} Caracter digitado pelo usuário
 * @returns {int} Número de 0 a 9
 */

function somenteNumeros(e){
    var tecla=(window.event)?event.keyCode:e.which;
    if((tecla>47 && tecla<58)) return true;
            else{
                    if (tecla==8 || tecla==0) return true;
                    else  return false;
    }
}

/**
 * Verifica data
 * @param {string} pObj
 * @returns {Boolean}
 */
function checkDate(pObj) {
  var expReg = /^((0[1-9]|[12]\d)\/(0[1-9]|1[0-2])|30\/(0[13-9]|1[0-2])|31\/(0[13578]|1[02]))\/(19|20)?\d{2}$/;
  var aRet = true;
  if ((pObj) && (pObj.value.match(expReg)) && (pObj.value != '')) {
	var dia = pObj.value.substring(0,2);
	var mes = pObj.value.substring(3,5);
	var ano = pObj.value.substring(6,10);
	if (mes == 4 || mes == 6 || mes == 9 || mes == 11 && dia > 30) 
	  aRet = false;
	else 
	  if ((ano % 4) != 0 && mes == 2 && dia > 28) 
		aRet = false;
	  else
		if ((ano%4) == 0 && mes == 2 && dia > 29)
		  aRet = false;
  }  else 
	aRet = false;  
  return aRet;
}

