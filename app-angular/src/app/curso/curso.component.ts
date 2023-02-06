import { Component, OnInit } from '@angular/core';
import { Curso } from './curso';
import { CursoService } from './curso.service';

@Component({
  selector: 'app-curso',
  templateUrl: './curso.component.html',
  styleUrls: ['./curso.component.css'],
})
export class CursoComponent implements OnInit {
  //url BASE
  //  url= "http://localhost/api/php/";

  vetor: Curso[] = [];
  //Objeto da Classe
  curso = new Curso();

  //constructor
  constructor(private curso_servico: CursoService) {}

  ngOnInit() {
    //Ao iniciar o sistema, lista os cursos
    this.selecao();
  }

  cadastro(curso: Curso) {
    this.curso_servico.cadastrarCurso(this.curso).subscribe((res: Curso[]) => {
      //Adicionando dados ao vetor
      this.vetor = res;

      //Limpar os atributos
      this.curso.nomeCurso = null;
      this.curso.valorCurso = null;

      //atualizar a listagem
      this.selecao();
    });
  }

  //selecao
  selecao() {
    this.curso_servico.obterCursos().subscribe((res: Curso[]) => {
      this.vetor = res;
    });
  }

  //alterar
  alterar(c: Curso) {
    this.curso_servico.atualizarCurso(this.curso).subscribe(
      //Retorna a informação
      (res) => {
        //Atualizar vetor
        this.vetor = res;

        //Limpar os valores do objeto
        this.curso.nomeCurso = null;
        this.curso.valorCurso = null;

        //Atualiza a lista
        this.selecao();
      }
    );
  }

  //remover
  remover(c: Curso) {
    this.curso_servico.removerCurso(this.curso).subscribe((res: Curso[]) => {
      this.vetor = res;
      this.curso.nomeCurso = null;
      this.curso.valorCurso = null;
    });
  }
  //selecionar especifico
  selecionarCurso(c: Curso) {
    this.curso.idCurso = c.idCurso;
    this.curso.nomeCurso = c.nomeCurso;
    this.curso.valorCurso = c.valorCurso;
  }
}
