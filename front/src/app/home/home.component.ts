import { Component } from '@angular/core';
import { HttpClientService } from "../services/httpClient.service";

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.less']
})
export class HomeComponent {

    dataObject: any;
    constructor(private readonly httpServices: HttpClientService) {
    }
    ngOnInit() {
        this.httpServices.getResources('https://localhost:8000/').subscribe(data => {
            this.dataObject = data;
        });
    }
}
