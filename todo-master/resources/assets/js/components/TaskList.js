import axios from 'axios'
import React, { Component } from 'react'

class TaskList extends Component {
  constructor (props) {
	super(props)
	this.state = {
	  details: {},
	}
  }

  componentDidMount () {
	const taskId = this.props.match.params.id

	axios.get(`/api/showdet/${taskId}`).then(response => {
	  this.setState({
		details: response.data,
	  })
	})
  }

  render () {
	const { details } = this.state
	console.log("project",details);
	return (
	
		<div className='jumbotron main-section col-md-10 col-md-offset-1'>
			
				<h1>{details.task}</h1>

				<table className='table table-bordered'>
					<tbody>
						<tr>
						  <th scope='row'>Description</th>
						  <td>{details.description}</td>
						</tr>
						<tr>
						  <th scope='row'>Start Date</th>
						  <td colspan='2'>{details.start_date}</td>
						</tr>
						<tr>
						  <th scope='row'>End Date</th>
						  <td colspan='2'>{details.end_date}</td>
						</tr>
						<tr>
						  <th scope='row'>Status</th>
						  <td colspan='2'>{details.status}</td>
						</tr>
					</tbody>
				</table>

		</div>
	  
	)
  }
}

export default TaskList