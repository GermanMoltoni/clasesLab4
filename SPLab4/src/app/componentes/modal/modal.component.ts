import { Component, OnInit,Inject,Output,EventEmitter } from '@angular/core';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material';
import {Persona} from '../../clases/persona';
@Component({
  selector: 'app-modal',
  templateUrl: './modal.component.html',
  styleUrls: ['./modal.component.css']
})
export class ModalComponent implements OnInit {
@Output() persona:EventEmitter<Persona> = new EventEmitter<Persona>();
  constructor(      public dialogRef: MatDialogRef<ModalComponent>,
,    @Inject(MAT_DIALOG_DATA) public data: any) { 
  }
  
  ngOnInit() {
  }
  modificar(){
     
   
      this.dialogRef.close();
 
  }
}
