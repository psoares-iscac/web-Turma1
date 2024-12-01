/*
MySQL Data Transfer
Source Host: localhost
Source Database: turma1
Target Host: localhost
Target Database: turma1
Date: 01/12/2024 17:37:38
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for eventos
-- ----------------------------
DROP TABLE IF EXISTS `eventos`;
CREATE TABLE `eventos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(128) NOT NULL,
  `data` date DEFAULT NULL,
  `descricao` varchar(256) DEFAULT NULL,
  `texto` text DEFAULT '',
  `imagem` varchar(128) DEFAULT NULL,
  `visivel` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `eventos` VALUES ('1', 'Conferência Horizonte Digital', '2025-02-15', 'Um encontro de especialistas para discutir tendências em tecnologia e inovação.', 'Um evento inovador focado em explorar as últimas tendências tecnológicas, com palestras de especialistas renomados sobre inteligência artificial, realidade aumentada, e o futuro digital. O evento oferece workshops interativos e painéis de discussão para conectar profissionais de diferentes áreas da tecnologia, apresentando soluções disruptivas que estão moldando o mundo digital. É uma excelente oportunidade para networking e aprendizado prático sobre o futuro da tecnologia.', 'evento-1.webp', '0');
INSERT INTO `eventos` VALUES ('2', ' Festival Gastronômico Sabores do Mundo', '2024-03-08', 'Uma celebração culinária com pratos típicos de diferentes países.', 'Uma grande celebração das culinárias do mundo, com estandes de comida típica de vários países. Chefs internacionais demonstram suas habilidades, preparando pratos únicos que permitem aos participantes experimentar diferentes culturas por meio dos sabores. Além disso, o evento conta com apresentações culturais, música ao vivo e workshops sobre gastronomia, promovendo uma experiência sensorial completa para todos os visitantes, que podem desfrutar de um ambiente alegre e acolhedor.\n\n', 'evento-2.webp', '0');
INSERT INTO `eventos` VALUES ('3', 'Seminário Saúde e Bem-Estar', '2024-06-10', 'Palestras e workshops focados em saúde mental e física.', 'O Seminário Saúde e Bem-Estar oferece palestras e workshops sobre como manter uma vida saudável, abordando tópicos como nutrição, exercícios físicos, e saúde mental. Com especialistas na área, os participantes aprendem a adotar práticas que promovem o equilíbrio físico e emocional, melhorando sua qualidade de vida. O evento também oferece sessões práticas de yoga, meditação e bem-estar, proporcionando aos participantes uma experiência imersiva para renovar corpo e mente.', 'evento-3.webp', '1');
INSERT INTO `eventos` VALUES ('4', 'Encontro de Sustentabilidade e Meio Ambiente', '2024-11-07', 'Discussões sobre práticas sustentáveis e preservação ambiental.', 'Este evento reúne líderes e especialistas em sustentabilidade para discutir soluções inovadoras para os desafios ambientais. Com estandes interativos sobre energias renováveis, reciclagem e práticas ecológicas, o evento visa promover ações concretas em prol do meio ambiente. Palestras, workshops e painéis abordam desde a redução de resíduos até o impacto das mudanças climáticas. A ideia é engajar os participantes em práticas sustentáveis para um futuro mais verde e equilibrado.', 'https://placehold.co/400x400?text=Evento+4', '1');
INSERT INTO `eventos` VALUES ('5', 'Feira de Negócios e Empreendedorismo', '2024-09-01', 'Exposição de startups e networking para empreendedores.', 'A Feira de Negócios e Empreendedorismo é um espaço dinâmico onde empreendedores, startups e investidores se conectam para discutir inovações, fazer parcerias e compartilhar ideias. O evento conta com palestras motivacionais de empresários de sucesso e workshops práticos sobre como escalar negócios, criar produtos inovadores e atrair investimentos. É uma excelente oportunidade para quem busca expandir seus negócios, trocar experiências e aprender com os melhores no mundo dos negócios.', 'https://placehold.co/400x400?text=Evento+5', '1');
INSERT INTO `eventos` VALUES ('6', 'Mostra de Cinema Independente', '2025-01-16', 'Exibição de filmes de diretores emergentes e debate com cineastas.', 'A Mostra de Cinema Independente celebra a produção cinematográfica independente, exibindo filmes de cineastas emergentes. O evento oferece aos participantes a oportunidade de conhecer novas vozes no cinema, com debates e discussões sobre os temas e técnicas presentes nas obras exibidas. O foco é explorar filmes inovadores e impactantes, além de criar um espaço de diálogo entre cineastas, críticos e o público. Um evento que promove a diversidade e a criatividade no cinema contemporâneo.', 'https://placehold.co/400x400?text=Evento+6', '1');
INSERT INTO `eventos` VALUES ('7', 'Congresso de Educação', '2025-11-30', 'Debates sobre o futuro da educação e metodologias inovadoras.', 'O Congresso de Educação Transformadora reúne educadores, especialistas e inovadores para discutir o futuro da educação. Através de palestras e workshops, são abordados temas como novas metodologias de ensino, tecnologia nas escolas, e a importância de uma educação inclusiva e personalizada. O evento busca inspirar educadores a repensar suas práticas, explorar novas abordagens pedagógicas e preparar os alunos para os desafios do século XXI. É uma oportunidade para transformar a educação e o aprendizado.', 'https://placehold.co/400x400?text=Evento+7', '0');
INSERT INTO `eventos` VALUES ('8', 'Show Beneficente Luz e Música', '2025-04-08', 'Apresentações musicais para arrecadar fundos para causas sociais.', 'O Show Beneficente Luz e Música é uma noite de celebração com apresentações de artistas de diversos gêneros musicais, com o objetivo de arrecadar fundos para causas sociais. Além das performances, o evento conta com atividades paralelas, como sorteios e exposições culturais, onde os participantes podem contribuir com doações para apoiar projetos sociais que promovem a inclusão e o bem-estar de comunidades carentes. A noite é uma fusão de música e solidariedade para um impacto positivo.', 'https://placehold.co/400x400?text=Evento+8', '1');
