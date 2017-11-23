import { Directive, ElementRef, Renderer2, OnInit, Input, OnDestroy } from '@angular/core';
import { MatDialog, MatDialogRef } from '@angular/material';
import { ModalComponent } from '../../componentes/modal/modal.component';
@Directive({
  selector: '[appMiBoton]'
})
export class MiBotonDirective {
  @Input('appMiBoton') persona: any;
  @Input() FuncionClick: Function;
  @Input() FuncionOver: Function;
  
  @Input() FuncionOut: Function;
  fileNameDialogRef: MatDialogRef<ModalComponent>;
  
  constructor(private obj: ElementRef, private renderizador: Renderer2,private dialog: MatDialog) { }
  
    ngOnInit(){
      this.FuncionClick = this.renderizador.listen(this.obj.nativeElement,'click',e=>{
        this.editar();
        this.renderizador.setStyle(this.obj.nativeElement, 'backgroundColor',  'pink' );
        
      });
      this.FuncionOver = this.renderizador.listen(this.obj.nativeElement,'mouseover',e=>{
        this.renderizador.setStyle(this.obj.nativeElement, 'backgroundColor',  'pink' );
  
      });
      this.FuncionOut = this.renderizador.listen(this.obj.nativeElement,'mouseout',e=>{
        this.renderizador.setStyle(this.obj.nativeElement, 'backgroundColor',   'red'  );
  
      });
  
    }
    ngOnDestroy(){
      this.FuncionOver();
      this.FuncionClick();
      this.FuncionOut();
    }
    editar(){
      this.fileNameDialogRef = this.dialog.open(ModalComponent, {
        hasBackdrop: false,
        width:"50%",
        data:this.persona
      });
      this.fileNameDialogRef.afterClosed().subscribe(result => {
        console.log(result);
    
      });
    }
  }
