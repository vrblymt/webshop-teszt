import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Toplist extends Component {
    constructor(props)
    {
        super(props);
        this.state = {
            toplist: []
        };
    }
    componentDidMount()
    {
        axios.get("https://europe.api.riotgames.com/lor/ranked/v1/leaderboards?api_key=RGAPI-03cf8fdb-bbe5-4912-acd3-4fb8954dc625",{
            headers:{
                'Access-Control-Request-Headers': 'Content-Type, Authorization'
            },
            
        }).then(res=>console.log(res.data));
        
    }
    render() {
    const lista = this.state.toplist.map(user=><li>${user.name} in: ${user.rank}</li>)
        return (
                <div className="card">
                     <div className="card-header">Toplist Component</div>
                    <div className="card-body">
                        <ul>
                            {lista}
                        </ul>
                    </div>
                </div>
                       
        );
    }
}

