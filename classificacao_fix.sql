-- Script para corrigir a tabela classificacao
-- Remove a constraint errada e cria a correta

-- 1. Remover a constraint incorreta
ALTER TABLE `classificacao` 
DROP FOREIGN KEY `fk_classificacao_selecao`;

-- 2. Adicionar a constraint correta (apontando para selecoes)
ALTER TABLE `classificacao`
ADD CONSTRAINT `fk_classificacao_selecao` 
FOREIGN KEY (`selecao`) REFERENCES `selecoes` (`id`) 
ON DELETE CASCADE ON UPDATE CASCADE;

-- Verificar se a constraint foi criada corretamente
SHOW CREATE TABLE `classificacao`;
