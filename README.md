# Projeto Cafuné Pâtisserie

## Visão Geral
Bem-vindo ao 'Projeto Cafuné Pâtisserie' – uma solução inovadora para a gestão de patisseries. Este projeto foi desenvolvido pela equipe 'Wisetech', uma es simplificar o processo de gestão de pedidos, fornecer um painel administrativo amigável e melhorar a eficiência operacional de patisseries.

## Atualizações Recentes
- **Painel Administrativo 1.0**: Novo painel administrativo para gestão eficiente de pedidos.
- **Página de Indexação de Pedidos**: Desenvolvimento de uma página dedicada para indexação de pedidos.
- **Processamento de Pedidos**: Funcionalidade aprimorada para processar e armazenar pedidos no banco de dados.
- **Processo de Checkout**: Melhorias contínuas no processo de checkout.
- **Melhorias na Mensagem do Menu**: Diversas melhorias no sistema de mensagens do menu.

## GUIA DE INSTALAÇÃO
- Crie uma pasta onde ficará todos os arquivos do projeto
- Abra a pasta no VS Code, abra o terminal e insira o COMANDO ABAIXO PARA DUPLICAR O REPO:
    
    ```jsx
    git clone https://github.com/caio-pellegrini/projeto-cafune-patisserie.git
    ```
    

## PARA INSTALAR E CONFIGURAR O LARAVEL:

1. De o comando abaixo (vai abrir outra janela, feche a antiga):
    
    ```jsx
    code projeto-cafune-patisserie
    ```
    
2. Se não tiver instaldo na sua máquina, instale o composer pelo site oficial: https://getcomposer.org/ (O composer é o instalador de pacotes do PHP)
3. Insira o comando (vai instalar os pacotes requeridos na pasta atual)
    
    ```jsx
    composer install
    ```
    
4. Insira o comando abaixo (vai instalar o npm - lembre-se que você precisa ter o node instalado em sua máquina)
    
    ```jsx
    npm install
    ```
    
5. Insira o comando abaixo (vai criar o .env, arquivo de configurações):
    
    ```jsx
    copy .env.example .env
    ```
    
6. Insira o comando abaixo:
    
    ```jsx
    php artisan key:generate
    ```
    
7. LIGUE SUA CONEXÃO MYSQL
8. Insira o comando abaixo (vai criar o banco e as tables)
    
    ```jsx
    php artisan migrate
    ```
    

## PARA RODAR O SERVIDOR

- No terminal do VS Code, insira o comando abaixo:
    
    ```jsx
    npm run dev
    ```
    
- Abra OUTRO terminal, sem fechar o primeiro, e rode o comando abaixo:
    
    ```jsx
    php artisan serve
    ```
    
- Clique no endereço que vai aparecer na tela (geralmente `[[http://127.0.0.1:8000](http://127.0.0.1:8000/)]` )
   
## Uso
Após configurar o projeto, você pode:
- Acessar o painel administrativo para gerenciar pedidos.
- Visualizar e processar pedidos através da página de indexação de pedidos.
- [Quaisquer outras instruções de uso específicas para recursos recentes]

## Contribuições
Contribuições para o 'Projeto Padaria Cafuné' são bem-vindas!
