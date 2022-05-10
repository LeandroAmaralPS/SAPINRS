sapinrs

Sistema de Aluguel e Pagamentos Inter Naútico Rio Grandense

https://docs.google.com/document/d/1uHyxf0nQbeOXj4uPScIY-66v17AsPCs5/edit?usp=sharing&ouid=104337424033932546095&rtpof=true&sd=true

Figma: https://www.figma.com/file/Ki6EZeeEmSI2N3fB4n3zf1

tipo_usuario - (id, nome [gerente, socio, colaborado, n socio]);

login - (id, usuario, password, nome, cpf, email, telefone, dt_nasc, status enum[ativo, inativo, analise], fk_tipo_usuario);

locação - (id, nome, descricao, preco, capacidade, hora_inicio, hora_fim);

img - (id, nome, fk_locacao);

aluguel - (id, turno, status, data, fk_login);
