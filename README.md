Legacy System Migrate
Este projeto faz parte de um estudo de caso focado na modernização de sistemas legados. O objetivo central é documentar e executar a transição de uma arquitetura monolítica baseada em PHP Nativo para uma estrutura de API moderna e escalável utilizando Java e React.
Descrição do Projeto
Muitas empresas enfrentam o desafio de manter softwares antigos que são vitais para a operação, mas possuem tecnologias defasadas. Este repositório demonstra o processo de mapeamento da lógica de negócio existente e a implementação de boas práticas de segurança e performance durante a migração da stack tecnológica.
Tecnologias Utilizadas (Fase Inicial)
Linguagem: PHP 8.x (Backend)
Banco de Dados: MySQL (Persistência)
Formato de Comunicação: JSON (API REST)
Segurança: Uso de Prepared Statements para prevenção de SQL Injection.
Estrutura de Diretórios
/includes: Contém as configurações de conexão e definições de ambiente do banco de dados.
/server: Contém os endpoints da API responsáveis pelo processamento das requisições e regras de negócio.
Funcionalidades Implementadas
Conexão automatizada com banco de dados via MySQLi.
Script de criação automática de tabelas (Schema Bootstrap).
Cadastro de novos usuários com validação de integridade e tratamento de entradas duplicadas.
Listagem dinâmica de registros em formato JSON para integração com interfaces Front-end.
Roadmap de Migração
Implementação da camada de persistência e modelos de dados em Java com Spring Boot (JPA/Hibernate).
Refatoração dos endpoints PHP para Controllers REST em Java.
Desenvolvimento de uma interface de Dashboard em React.js para consumo da nova API.
Implementação de protocolos de autenticação e autorização (JWT).
Desenvolvedor
Kelwin Gil Fernandes
LinkedIn: https://www.linkedin.com/in/kelwin-tecnico-desenvolvimento-de-sistemas/
Formação: Técnico em Desenvolvimento de Sistemas - SENAI
