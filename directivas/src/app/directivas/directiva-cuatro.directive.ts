import { Directive } from '@angular/core';
import { Directive, ElementRef, Renderer2, OnInit, Input, OnDestroy } from '@angular/core';

@Directive({
  selector: '[appDirectivaCuatro]'
})
export class DirectivaCuatroDirective {
@Input() input: string;
@Input() FuncionHover: Function;
@Input() FuncionOut: Function;
  constructor(private obj: ElementRef, private renderizador: Renderer2) { }
  ngOnDestroy(){

  }
  ngOnInit(){
    this.FuncionHover = this.renderizador.listen(this.obj.nativeElement,'mouseover',e=>{
      this.renderizador.setStyle(this.obj.nativeElement, 'backgroundColor',  'pink' );
      this.renderizador.setProperty(this.obj.nativeElement, 'textContent', 'hola');

    });
    this.FuncionOut = this.renderizador.listen(this.obj.nativeElement,'mouseout',e=>{
      this.renderizador.setStyle(this.obj.nativeElement, 'backgroundColor',   'red'  );
      this.renderizador.setProperty(this.obj.nativeElement, 'textContent', 'chau');

    });

  }
  ngOnDestroy(){
    this.FuncionHover();
    this.FuncionOut();
  }
}
