
CREATE TABLE marca_fornecedor (
                id_marca_fornecedor SERIAL NOT NULL,
                nome VARCHAR(255) NOT NULL,
                PRIMARY KEY (id_marca_fornecedor)
);


CREATE TABLE admin (
                id_admin SERIAL NOT NULL,
                nome VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL,
                senha VARCHAR(255) NOT NULL,
                PRIMARY KEY (id_admin)
);


CREATE TABLE fornecedor (
                id_fornecedor SERIAL NOT NULL,
                nome_fornecedor VARCHAR(255) NOT NULL,
                telefone INTEGER NOT NULL,
                id_marca_fornecedor SERIAL NOT NULL,
                PRIMARY KEY (id_fornecedor),
		FOREIGN KEY(id_marca_fornecedor) REFERENCES marca_fornecedor(id_marca_fornecedor) ON DELETE CASCADE
);


CREATE TABLE produto (
                id_produto SERIAL NOT NULL,
                nome_produto VARCHAR(255) NOT NULL,
                preco FLOAT NOT NULL,
                id_fornecedor INTEGER NOT NULL,
                PRIMARY KEY (id_produto),
                FOREIGN KEY(id_fornecedor) REFERENCES fornecedor(id_fornecedor) ON DELETE CASCADE
);


CREATE TABLE users (
                id SERIAL NOT NULL,
                name VARCHAR(255) NOT NULL,
                sobrenome VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL,
                password VARCHAR(255) NOT NULL,
                updated_at TIMESTAMP NOT NULL,
                created_at TIMESTAMP NOT NULL,
                telefone_residencial INTEGER NOT NULL,
                telefone_celular INTEGER NOT NULL,
                endereco VARCHAR(255) NOT NULL,
                PRIMARY KEY (id)
);


CREATE TABLE pedido (
                id_pedido SERIAL NOT NULL,
                data_agendamento DATE NOT NULL,
                total FLOAT NOT NULL,
                pago BOOLEAN NOT NULL,
                formas_pagamento VARCHAR(255) NOT NULL,
                horario VARCHAR(255) NOT NULL,
                lista_espera BOOLEAN NOT NULL,
                confirmacao BOOLEAN NOT NULL,
                cancelado BOOLEAN NOT NULL,
                id INTEGER NOT NULL,
                PRIMARY KEY (id_pedido),
                FOREIGN KEY(id) REFERENCES users(id) ON DELETE CASCADE
);


CREATE TABLE servico (
                id_servico SERIAL NOT NULL,
                nome_servico VARCHAR(255) NOT NULL,
                imagem VARCHAR(255) NOT NULL,
                preco_desconto FLOAT,
                preco FLOAT NOT NULL,
                promocao BOOLEAN NOT NULL,
                descricao VARCHAR(255),
                PRIMARY KEY (id_servico)
);


CREATE TABLE item_pedido (
                id_item SERIAL NOT NULL,
                quant_pessoa INTEGER NOT NULL,
                valor_unitario FLOAT NOT NULL,
                id_pedido INTEGER NOT NULL,
                id_servico INTEGER NOT NULL,
                PRIMARY KEY (id_item),
                FOREIGN KEY(id_servico) REFERENCES servico(id_servico) ON DELETE CASCADE, 
		FOREIGN KEY(id_pedido) REFERENCES pedido(id_pedido) ON DELETE CASCADE
);

