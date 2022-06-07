<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

# Inicie o Sistema

- git clone https://github.com/WelderOliveira/desafio-wr-it.git

* cd desafio-wr-it

* cp .env.example .env

* Atualize as variáveis de ambiente do arquivo .env
```dosini
APP_NAME=desafio-wr-it
APP_URL=http://localhost:8180

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=nome_db
DB_USERNAME=root
DB_PASSWORD=root
```

Suba os containers do projeto
```sh
docker-compose up -d
```

Acessar o container
```sh
docker-compose exec desafio-writ bash
```

* composer install

* php artisan key:generate

* php artisan migrate

## API Aluno
- [X] Cadastrar Aluno
  ```
    POST - http://127.0.0.1:8000/api/alunos
      {
          "name": "NOMEDOALUNO",
          "email": "teste@teste.com",
          "dt_nascimento": "2022-01-02"
      }

- [X] Listar Alunos
  ```
    GET - http://127.0.0.1:8000/api/alunos/

- [X] Listar Aluno
  ```
    GET - http://127.0.0.1:8000/api/alunos/{id}

- [X] Atualizar Aluno
  ```
    PUT - http://127.0.0.1:8000/api/alunos/{id}
      {
          "name": "NOMEDOALUNO",
          "email": "teste@teste.com",
          "dt_nascimento": "2022-01-02"
      }
  
- [X] Excluir Aluno
  ```
    DELETE - http://127.0.0.1:8000/api/alunos/{id}

- [X] Buscar Aluno pelo Nome ou Email
  ```
    GET - http://127.0.0.1:8000/api/search?name=NOMEDOALUNO&email=EMAILDOALUNO

## API Curso

- [X] Cadastrar Curso
  ```
    POST - http://127.0.0.1:8000/api/cursos
      {
          "titulo": "NOMEDOCURSO",
          "descricao": "DESCRIÇÃODOCURSO"
      }

- [X] Listar Cursos
  ```
    GET - http://127.0.0.1:8000/api/cursos/

- [X] Listar Curso
  ```
    GET - http://127.0.0.1:8000/api/cursos/{id}

- [X] Atualizar Curso
  ```
    PUT - http://127.0.0.1:8000/api/cursos/{id}
      {
          "titulo": "NOMEDOCURSO",
          "descricao": "DESCRIÇÃODOCURSO"
      }

- [X] Excluir Curso
  ```
    DELETE - http://127.0.0.1:8000/api/cursos/{id}

## API Matricula

- [X] Matricular Aluno a um curso
  ```
    POST - http://127.0.0.1:8000/api/matricula
      {
          "aluno_id": id-do-Aluno,
          "curso_id": id-do-Curso
      }
  
- [X] Consulta os Cursos que o Aluno está matriculado
  ```
    GET - http://127.0.0.1:8000/api/consultaCurso/{id-do-Aluno}

- [X] Consulta os Alunos que estão matriculados naquele curso
  ```
    GET - http://127.0.0.1:8000/api/consultaAlunos/{id-do-Curso}

- [X] Excluir Matricula
  ```
    DELETE - http://127.0.0.1:8000/api/matricula/{id-da-Matricula}

>Para solicitar o Cadastro, utilize Key = Content-Type | Value = application/json
