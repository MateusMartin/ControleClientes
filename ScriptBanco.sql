USE [TestePhp]
GO
/****** Object:  Table [dbo].[Clientes]    Script Date: 22/02/2022 17:20:39 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Clientes](
	[idCliente] [int] NOT NULL,
	[Nome] [varchar](45) NULL,
	[Cpf] [varchar](14) NULL,
	[Tipo] [varchar](1) NULL,
	[Dtnasc] [date] NULL,
	[Usuario_idUsuario] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[idCliente] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[Enderecos]    Script Date: 22/02/2022 17:20:39 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Enderecos](
	[idEndereco] [int] NOT NULL,
	[Logradouro] [varchar](100) NULL,
	[Numero] [varchar](5) NULL,
	[Complemento] [varchar](45) NULL,
	[Bairro] [varchar](45) NULL,
	[Cep] [varchar](8) NULL,
	[Uf] [varchar](2) NULL,
	[Enderecocol] [varchar](45) NULL,
	[Cliente_idCliente] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[idEndereco] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[Log_acesso]    Script Date: 22/02/2022 17:20:39 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Log_acesso](
	[idLogs] [int] NOT NULL,
	[Descricao] [varchar](45) NULL,
	[Usuario_idUsuario] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[idLogs] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[Telefones]    Script Date: 22/02/2022 17:20:39 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Telefones](
	[idTelefone] [int] NOT NULL,
	[DDD] [varchar](2) NULL,
	[Fone] [varchar](9) NULL,
	[Tipo] [varchar](45) NULL,
	[Cliente_idCliente] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[idTelefone] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[Usuarios]    Script Date: 22/02/2022 17:20:39 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Usuarios](
	[idUsuario] [int] NOT NULL,
	[Nome] [varchar](45) NULL,
	[Senha] [varchar](max) NULL,
PRIMARY KEY CLUSTERED 
(
	[idUsuario] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
ALTER TABLE [dbo].[Clientes]  WITH CHECK ADD FOREIGN KEY([Usuario_idUsuario])
REFERENCES [dbo].[Usuarios] ([idUsuario])
GO
ALTER TABLE [dbo].[Enderecos]  WITH CHECK ADD FOREIGN KEY([Cliente_idCliente])
REFERENCES [dbo].[Clientes] ([idCliente])
GO
ALTER TABLE [dbo].[Log_acesso]  WITH CHECK ADD FOREIGN KEY([Usuario_idUsuario])
REFERENCES [dbo].[Usuarios] ([idUsuario])
GO
ALTER TABLE [dbo].[Telefones]  WITH CHECK ADD FOREIGN KEY([Cliente_idCliente])
REFERENCES [dbo].[Clientes] ([idCliente])
GO
