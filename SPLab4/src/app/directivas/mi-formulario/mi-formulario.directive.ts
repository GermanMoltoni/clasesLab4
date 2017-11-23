import { Directive, ElementRef, Renderer2, OnInit, Input, OnDestroy } from '@angular/core';

@Directive({
  selector: '[appMiFormulario]'
})
export class MiFormularioDirective {
@Input('appMiFormulario') public persona;
  constructor(private obj: ElementRef, private renderizador: Renderer2) { }
  ngOnInit(){
    let element = this.obj.nativeElement;
    console.log(element.childNodes[0].parentElement);
    
    this.renderizador.setValue(element,'asdsadsa');
  }

}
