# Legacy System Migrate

Este projeto faz parte de um estudo de caso focado na modernização de sistemas legados. O objetivo central é documentar e executar a transição de uma arquitetura monolítica baseada em PHP Nativo para uma estrutura de API moderna e escalável utilizando Java e React.

---

## Descricao do Projeto

Muitas empresas enfrentam o desafio de manter softwares antigos que sao vitais para a operacao, mas possuem tecnologias defasadas. Este repositorio demonstra o processo de mapeamento da logica de negocio existente e a implementacao de boas praticas de seguranca e performance durante a migracao da stack tecnologica.

---

## Tecnologias Utilizadas (Fase one)

* **Linguagem:** PHP 8.x (Backend)
* **Banco de Dados:** MySQL (Persistencia)
* **Formato de Comunicacao:** JSON (API REST)
* **Seguranca:** Uso de Prepared Statements para prevencao de SQL Injection.

---

## Estrutura de Diretorios

* **/includes:** Contem as configuracoes de conexao e definicoes de ambiente do banco de dados.
* **/server:** Contem os endpoints da API responsaveis pelo processamento das requisicoes e regras de negocio.

---

## Funcionalidades Implementadas

* Conexao automatizada com banco de dados via MySQLi.
* Script de criacao automatica de tabelas (Schema Bootstrap).
* Cadastro de novos usuarios com validacao de integridade e tratamento de entradas duplicadas.
* Listagem dinamica de registros em formato JSON para integracao com interfaces Front-end.

---

## Roadmap de Migracao

1. Implementacao da camada de persistencia e modelos de dados em Java com Spring Boot (JPA/Hibernate).
2. Refatoracao dos endpoints PHP para Controllers REST em Java.
3. Desenvolvimento de uma interface de Dashboard em React.js para consumo da nova API.
4. Implementacao de protocolos de autenticacao e autorizacao (JWT).

---

## Desenvolvedor

**Kelwin Gil Fernandes** * **LinkedIn:** https://www.linkedin.com/in/kelwin-tecnico-desenvolvimento-de-sistemas/  
* **Formacao:** Tecnico em Desenvolvimento de Sistemas - SENAI
* 
