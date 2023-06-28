import { Injectable } from '@angular/core';
import { HttpClient } from "@angular/common/http";

@Injectable({
  providedIn: 'root'
})
export class HttpClientService {

    constructor(private readonly http: HttpClient) { }

    getResources(uri: string) {
        return this.http.get(uri);
    }
}
