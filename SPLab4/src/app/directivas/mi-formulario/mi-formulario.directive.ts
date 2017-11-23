import { Directive, ElementRef, Renderer2, OnInit, Input, OnDestroy } from '@angular/core';

@Directive({
  selector: '[appMiFormulario]'
})
export class MiFormularioDirective {
@Input('appMiFormulario') public dato;
  constructor(private obj: ElementRef, private renderizador: Renderer2) { }
  ngOnInit(){
    this.renderizador.setAttribute(this.obj.nativeElement,"value",this.dato);
  }

}
