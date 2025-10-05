# 📞 Sistema de Gestão de Chamados TI (Projeto TCC)

> Sistema de controle e gestão de chamados para área de suporte de TI, desenvolvido como parte de um Trabalho de Conclusão de Curso (TCC).  

---

## 🎯 Visão Geral

O sistema permite gerenciar todo o ciclo de vida de um chamado: desde abertura, atribuição, acompanhamento, solução, até avaliação e criação de ordens de serviço.  
Ele também suporta autenticação de usuários, controle de permissões e edição de dados de usuários.

---

## 🧰 Tecnologias Usadas

Aqui estão as linguagens, frameworks e bibliotecas utilizadas no projeto:

| Camada / Componente        | Linguagem / Ferramenta                |
|----------------------------|----------------------------------------|
| Backend / lógica de negócio | PHP                                     |
| Frontend / interface        | JavaScript, HTML, CSS                   |
| Estilo e ícones             | CSS, FontAwesome                        |
| Banco de dados              | MySQL (via scripts SQL incluidos)       |
| Arquivos de configuração    | Arquivo `config.php`                    |

No repositório você vê que a distribuição do código reflete essas escolhas: PHP, JS, CSS, bibliotecas externas etc. 

---

## 📂 Estrutura do Repositório
```text
/
├── api/ → endpoints do backend
├── bibliotecas/ → bibliotecas externas
├── classes/ → classes auxiliares / modelos
├── css/ → estilos
├── fontawesome/ → ícones
├── imagens/ → imagens usadas na UI
├── js/ → scripts JavaScript
├── paginas/ → páginas web (views)
├── painel/ → área administrativa / painel
├── config.php → configuração do sistema
├── index.php → página inicial / ponto de entrada
├── projeto_tcc.sql → script SQL para criar o banco de dados
├── TCCII_v4.3_JL_Final.pdf → o documento do TCC que descreve o sistema
└── README.md → este arquivo
```

## 🚀 Funcionalidades Principais

1. **Autenticação e perfil de usuário**
   - Criação de conta
   - Login / logout
   - Edição de dados pessoais
   - Controle de permissões (níveis de acesso diferentes)

2. **Gerenciamento de chamados**
   - Abrir novo chamado
   - Listar chamados (com filtros)
   - Visualizar detalhes de um chamado
   - Editar chamados
   - Criar tarefas pendentes vinculadas a chamados
   - Inserir solução para chamados

3. **Avaliação e ordens de serviço**
   - Usuário pode avaliar o atendimento
   - Geração / registro de ordens de serviço

4. **Gestão administrativa no painel**
   - Controle de usuários
   - Administração de permissões
   - Visualização de relatórios (dependendo do escopo do TCC)

---

## 🖼️ Capturas / Mockups (Exemplo)
Tela de Login:
<img width="974" height="585" alt="image" src="https://github.com/user-attachments/assets/db05edbd-990e-4d9c-a91e-9a4197547008" />

PÁGINA PRINCIPAL, ABA CHAMADOS
<img width="1161" height="722" alt="image" src="https://github.com/user-attachments/assets/f4d2f2f5-2084-493f-a0a9-0ff5a9d3fb55" />

APENDICE G – PÁGINA CHAMADOS, ABA DESCRIÇÂO
<img width="1067" height="670" alt="image" src="https://github.com/user-attachments/assets/8d134185-9bcc-4653-be56-c917d48696dd" />

# 🧱 Detalhes Técnicos e Arquitetura

No documento do TCC (arquivo PDF “TCCII_v4.3_JL_Final.pdf”) você encontrará:

- Modelagem de dados (entidades e relacionamentos)  
- Diagrama de classes 
- Fluxos de interação  
- Casos de uso  
- Justificativa e fundamentação teórica  
- Descrição detalhada das funcionalidades  
- Critérios de validação  

## 📥 Como Instalar / Executar

1. Clone o repositório:  
   ```bash
   git clone https://github.com/jhiagho/ProjetoTCC.git

2. Importe o banco de dados usando o script SQL:
   ```sql
   projeto_tcc.sql

3. Configure o arquivo config.php com suas credenciais de banco, endereço, etc.
4. Coloque o projeto no servidor web (Apache / XAMPP / WAMP) com suporte a PHP.
5. Acesse via navegador apontando para index.php ou para a pasta raiz do projeto.

✔️ Próximas Melhorias / Possíveis Extensões

- Validações mais robustas no frontend e backend
- Sistema de notificações (e-mail, alertas)
- Relatórios estatísticos (por tempo, por usuário, por tipo de chamado)
- Painel de auditoria / log de ações
- Interface mais responsiva / mobile
- Uso de framework moderno (Laravel, React, Vue) para facilitar manutenção

📄 Referência do TCC

Para mais detalhes conceituais, justificativas, metodologia, revisão bibliográfica e análise de resultados, consulte o documento do TCC incluído: TCCII_v4.3_JL_Final.pdf. 
GitHub

🧾 Licença & Créditos

Este projeto foi desenvolvido por Jhiagho como requisito de conclusão de curso.
Você pode reutilizar ou adaptar o código, com atribuição apropriada.
