function filtro() {//Ao carregar a janela adiciona os eventos de pressionar tecla
            var input = document.getElementById("txtColuna3");//busca o input de vaga
            input.addEventListener("keyup", function () {
                var table = document.getElementById("tabela");//busca a tabela

                var valor = input.value;//pega o valor do input 

                for (var i = 0; i < table.rows.length; i++) {//percorre as linhas da tabela

                    if (table.rows[i].cells[2].innerHTML.toUpperCase().indexOf(valor.toUpperCase()) < 0) {
                        //Dentro da palavra na tabela procura pelo valor do input
                        //Se não tiver retorna -1
                        //Se tiver retorna o index onde está o trecho da palavra
                        table.rows[i].classList.add('hide');
                    } else {
						table.rows[i].classList.remove('hide');
                        //table.rows[i].style.display = 'inline-block';
                    }
                }
            })
			var input2 = document.getElementById("txtColuna1");//busca o input de data
            input2.addEventListener("keyup", function () {
                var table = document.getElementById("tabela");//busca a tabela

                var valor2 = input2.value;//pega o valor do input 

                for (var i = 0; i < table.rows.length; i++) {//percorre as linhas da tabela

                    if (table.rows[i].cells[0].innerHTML.indexOf(valor2) < 0) {
                        //Dentro da palavra na tabela procura pelo valor do input
                        //Se não tiver retorna -1
                        //Se tiver retorna o index onde está o trecho da palavra
                        table.rows[i].classList.add('hide');
                    } else {
						table.rows[i].classList.remove('hide');
                        //table.rows[i].style.display = 'inline-block';
                    }
                }
            })
        }
		
function enviar(){
	var valor = document.getElementById("txtColuna0").value;
		if (valor != null && valor != "")
		alert("Boa Sorte, " + valor + ", Você está concorrendo a está vaga")
		else 
		alert("Preencha o campo Nome")
}

function direcinarIndex(){
	window.open("index.html", "_self");
	
}
function direcionarVaga(){
	window.open("vaga.html", "_self");
	
}

function alerta(){
	var unidade = prompt("Você está no Polo ou GTC")
				alert("Bem vindo a unidade, " + unidade)
					
				document.getElementById("unidade").value = unidade;
}
