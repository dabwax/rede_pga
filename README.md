<img src="https://raw.githubusercontent.com/dabwax/pep/master/webroot/img/logo_monster.png" width="150" />

# PEP - Plataforma de Ensino Personalizado

URL oficial: http://pep.com.br

## Base de Dados

MySQL, dump localizado em webroot/rede_pga.sql.

## Framework

Utilizado o CakePHP v3 com AngularJS v1.4.8, jQuery e Kendo UI.

## Instalação
* `git clone`
* Editar config/app.php e definir as configurações do datasource *default*.
* Importar base de dados.
* Habilitar mod_rewrite, php5-intl e cURL.
* Rodar `npm install` dentro da pasta do projeto.
* Rodar `gulp build` dentro da pasta do projeto (caso vá subir para produção).
* Rodar `gulp` dentro da pasta do projeto (caso vá desenvolver local).
* Rodar http://localhost/rede_pga
* ????
* PROFIT!

Observação: Este projeto roda com algumas tecnologias extras. Elas são:

1) Stylus

Para você fazer alterações no CSS, precisa rodar uma build nova para ser compilado uma versão minificada. Ou rodar apenas `gulp`, assim ele continuará rodando.

2) LiveReload

Utilize esta extensão do Chrome https://chrome.google.com/webstore/detail/livereload/jnihajbhpnppcggbcgedagnkighmdlei?hl=pt-BR para poder visualizar o LiveReload. Você precisa do comando `gulp` rodando para isto funcionar. Funciona apenas no ambiente de desenvolvimento.