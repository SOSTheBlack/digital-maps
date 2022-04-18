<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://www.cabecadelab.com.br/tmp/logoluizalabs.png" width="400"></a></p>

# Sumário
- Introdução
- Instalação
- Qualidade

# Introdução

A DigitalMaps é uma empresa especializada na produção de receptores GPS.

Esse aplicativo é um dos microserviços da DigitalMaps, sua responsabilidade é armazenar pontos de referência segundo sua latitude longitude e horário de funcionamento, além é claro, disponibilizar os pontos de referência(previamente cadastrados) próximos ao usuário ativo.

# Pré-requisitos

- MacOS, Linux ou Windows (via [WSL2](https://docs.microsoft.com/en-us/windows/wsl/about)
- Git


# Instalação

### Baixando microserviço

Nosso primeiro passo será clonar o projeto para sua maquina.

```shell
git clone https://github.com/SOSTheBlack/digital-maps

cd digital-maps
```

### Iniciando microserviço

No projeto é utilizado [Laravel Sail](https://laravel.com/docs/9.x/sail), uma interface de linha de comando leve para interagir com o ambiente de desenvolvimento [Docker](https://www.docker.com/why-docker/).

Antes de iniciar o microserviço, você deve garantir que nenhum outro servidor web ou banco de dados esteja rodando em seu computador local.

Para iniciar todos os containers Docker definidos, você deve executar o comando ``up``:

```shell
./vendor/bin/sail up
```

Uma vez iniciados os containers da aplicação, você pode acessar o projeto em seu navegador web em: ``http://localhost``

### Configurando alias

Por padrão, os comandos Sail são invocados usando o vendor/bin/sail.

No entanto, em vez de digitar repetidamente vendor/bin/sail para executar os comandos do Sail, você pode configurar um alias do Bash que permita executar os comandos do Sail com mais facilidade:
```shell
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```

Uma vez que o alias Bash tenha sido configurado, você pode executar comandos Sail simplesmente digitando sail.

````shell
sail up -d
````

Todos os próximos exemplos de comando será levado em consideração esse alias.

### Parando o microserviço

Para parar todos os containers do microserviço, você pode simplesmente pressionar Control + C para parar a execução do container. Ou, se os containers estiverem rodando em segundo plano, você pode usar o ``stop`` comando:

````shell
sail stop
````

# Qualidade do Código

### Testes automatizados

O Aplicativo DigitalMaps foi construído com tests em mente.

Para executar os tests que ficam no diretório ``/tests`` basta executar o comando abaixo:

````shell
sail test
````

![Digital Maps Test](./repo/tests.png "Digital Maps Test")

### sail composer phpstan

### sail composer phpinsights

## Documentação

A documentação do aplicativo pode ser importado para o seu Postman através do botão abaixo:

[![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/180952-861dd8da-216c-43b6-980c-a8d5953605e3?action=collection%2Ffork&collection-url=entityId%3D180952-861dd8da-216c-43b6-980c-a8d5953605e3%26entityType%3Dcollection%26workspaceId%3D9ff1b393-f814-4463-bcc3-414ac91c28ab#?env%5Bdigital-mpas%5D=W3sia2V5IjoiYmFzZV91cmwiLCJ2YWx1ZSI6Imh0dHA6Ly9kaWdpdGFsLW1hcHMudGVzdC9hcGkiLCJlbmFibGVkIjp0cnVlLCJ0eXBlIjoiZGVmYXVsdCJ9LHsia2V5IjoiYWNjZXNzX3Rva2VuIiwidmFsdWUiOiJjYzc4MWQzYmJhNThlZWU1OGJiNWQ5MzUyMDRkNjEyYTRlNTMxNjcyZTA5MjcyNmQwZTE1NWIxZTI1OTc3MjM2IiwiZW5hYmxlZCI6dHJ1ZSwidHlwZSI6ImRlZmF1bHQifV0=)

![Documentação](./repo/postman.png "Documentação")

## Configuração


sail composer phpstan

sail composer phpinsights
